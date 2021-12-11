<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentNotification;
use App\Models\{Comment, User, Member};
use App\Helpers\Pays\Contract\PayInterface;
use App\Helpers\Dbs\Contract\DbInterface;
use App\Services\Logs\LogInterface;
use App\Services\Payment\Contract\PaymentInterface;
class HomeController extends Controller
{
    public $pay;
    public $db;
    public $log;
    public $payment;
    public function __construct(PayInterface $pay, DbInterface $db, LogInterface $log, PaymentInterface $payment = null)
    {
        $this->pay = $pay;
        $this->db = $db;
        $this->log = $log;
        $this->payment = $payment;
    }
    public function index(Request $request)
    {
        
    }
    public function alo(Request $request)
    {
        $alo = 'alo';
        return view('alo', compact('alo'));
    }
    public function blo(Request $request)
    {
        return view('blo');
    }
    public function morphOneToOne()
    {
        $news = \App\Models\News::find(1);
        $image = \App\Models\Image::find(1);
        echo '<pre>'; var_dump($news->image, $image->imageable); die(); echo '</pre>';
    }
    public function morphOneToMany()
    {
        $news = \App\Models\News::find(1);
        $image = \App\Models\Image::find(1);
        echo '<pre>'; var_dump($news->images, $image->imageable); die(); echo '</pre>';
    }
    public function morphManyToMany()
    {
        $news = \App\Models\News::find(1);
        $tag = \App\Models\Tag::find(1);
        foreach ($news->tags as $key => $value) {
            echo '<pre>'; var_dump($value->pivot->toArray()); echo '</pre>';
        }
        echo '=========================<br>';
        echo '<pre>'; var_dump($news->tags); echo '</pre>';
        echo '=========================<br>';
        echo '<pre>'; var_dump($tag->news); echo '</pre>';
    }
    public function notifications(Request $request)
    {
        $user = User::find(2);
        return view('notifications', compact('user'));
    }
    public function insertComment(Request $request)
    {
        $commentId = Comment::insertGetId([
            'title' => 'title '.time(),
            'content' => 'content '.time(),
            'reply' => 'reply '.time(),
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
        \App\Events\InsertComment::dispatch(Comment::find($commentId));
        return view('alo');
    }
    public function mail(Request $request)
    {
        return view('notifications');
    }
    public function markAsReadNotification(Request $request)
    {
        User::find(2)->unreadNotifications->where('id', $request->id)->markAsRead();
        return redirect()->back();
    }
    public function sysKpiNotification(Request $request)
    {
        $member = Member::find(2);
        $data = new \stdClass;
        $data->type = 'kpi_work_assign';
        $data->title = 'Admin vừa phân công việc';
        $data->content = 'Đơn hàng ABC trạng thái: đơn hàng mới, đơn hàng chờ đặt cọc';
        $member->notify(new \App\Notifications\SysAdminNotification($data));
    }
    public function csrf(Request $request)
    {
        echo '<pre>'; var_dump(csrf_token()); die(); echo '</pre>';
    }
    public function interface(Request $request)
    {
        echo '<pre>'; var_dump($this->setting->name()); die(); echo '</pre>';
    }
    public function pay(Request $request, $type)
    {
        echo '<pre>'; var_dump($this->pay); die(); echo '</pre>';
    }
    public function db()
    {
        echo '<pre>'; var_dump($this->db->connect()); die(); echo '</pre>';
    }
    public function edit()
    {
        $this->middleware('auth');
        return view('alo');
    }
    public function exception(Request $request)
    {
        throw new \App\Exceptions\RegisterException("Dang ky bi loi roi", 400);
        echo '<pre>'; var_dump(__line__); die(); echo '</pre>';
        return view('exception');
    }
    public function exception2(Request $request)
    {
        throw new Exception("Error Processing Request", 1);
    }
    public function fullTextSearch(Request $request)
    {
        $alo = \DB::select("SELECT * from news where name like '%chó meo%'");
        $alo = \DB::select("SELECT * from news where name like '%Chó%mèo%'");
        $alo = \DB::select("SELECT * from news where name like '%Hằng%xinh%developer%'");
        // sắp xếp theo từ khóa liên quan nhất lên đầu
        $alo = \DB::select("SELECT *, MATCH (name) AGAINST ('chó mèo' IN NATURAL LANGUAGE MODE) as score from `news` where MATCH (name) AGAINST ('chó mèo' IN NATURAL LANGUAGE MODE) order by score desc");
        // boolearn mode hỗ trợ tìm kiếm với các toán tử +, - , * và sắp xếp theo từ khóa liên quan nhất lên đầu
        $alo = \DB::select("SELECT *, MATCH (name) AGAINST ('than*' IN BOOLEAN MODE) as score from `news` where MATCH (name) AGAINST ('than*' IN BOOLEAN MODE) order by score desc");
        $alo = \DB::select("SELECT *, MATCH (name) AGAINST ('+chó -mèo' IN BOOLEAN MODE) as score from `news` where MATCH (name) AGAINST ('+chó -mèo' IN BOOLEAN MODE) order by score desc");
    }
    public function macro(Request $request)
    {
        echo \Str::tna('Thanh Niên An');
        $users = \App\Models\User::paginate(1);
        return view('macro', compact('users'));
    }
    public function validation(Request $request)
    {
        if (\Request::isMethod('get')) {
            return view('validation', compact('request'));
        }
        $validator = \Validator::make(\Request::all(), [
            'agree' => 'accepted',
        ], [
            'accepted' => 'Bạn phải đồng ý với :attribute'
        ], [
            'agree' => 'Điều khoản dịch vụ'
        ]);
        echo '<pre>'; var_dump($validator->errors()->first()); die(); echo '</pre>';
    }
    public function validation2(Request $request)
    {
        if (\Request::isMethod('get')) {
            return view('validation', compact('request'));
        }
        $validator = \Validator::make(\Request::all(), [
            'email' => [new \App\Rules\uniqueEmailCustom],
        ], [
            
        ], [
            
        ]);
        echo '<pre>'; var_dump($validator->errors()->first()); die(); echo '</pre>';
    }
    public function validation3(Request $request)
    {
        if (\Request::isMethod('get')) {
            return view('validation', compact('request'));
        }
        $balance = 200000;
        $validator = \Validator::make(\Request::all(), [
            'amount' => ['required', function ($attribute, $value, $fail) use ($balance) {
            if ($value > $balance) {
                $fail('The '.$attribute.' đã vượt quá số dư hiện tại.');
            }
        }],
        ], [
            'required' => ':attribute là bắt buộc'
        ], [
            'amount' => 'Số tiền'
        ]);
        echo '<pre>'; var_dump($validator->errors()->first()); die(); echo '</pre>';
    }
    public function validatorExtendsProvide(Request $request)
    {
        if (\Request::isMethod('get')) {
            return view('validation', compact('request'));
        }
        $validator = \Validator::make(\Request::all(), [
            'type' => ['required', 'regex:/[1,2,3]/', "wallet_balance:$remainAmountAfterDeposit, $remainAmountAfterFullPayment"]
        ], [
            'required' => 'Lựa chọn một thanh toán',
            'regex' => 'Dữ liệu không hợp lệ'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function mix()
    {
        return view('mix');
    }
    public function bindingInterface(Request $request)
    {
        echo '<pre>'; var_dump($this->log); die(); echo '</pre>';        
    }
    public function payment(Request $request)
    {
        echo '<pre>'; var_dump($this->payment); die(); echo '</pre>';
    }
    public function exceptoinUnauthorized(\Request $request)
    {
        \Auth::authenticate();
        echo '<pre>'; var_dump(__line__); die(); echo '</pre>';
    }
    public function serialize()
    {
        $news = \App\Models\News::find(1);
        $newsJson = json_encode($news);
        $newsJson = json_decode($news);
        $newsSeria = serialize($news);
        $newsSeria = unserialize($newsSeria);
        echo '<pre>';
        var_dump($newsJson);
        var_dump($newsSeria);
        var_dump(serialize(['name' => 'an']));
    }
    public function contains()
    {
        $order = \App\Models\Order::find(1);
        echo '<pre>'; var_dump(
            $order->details->sum(function($v){
                return $v->ratings->count() > 0 ? 1 : 0;
            })
        ); die(); echo '</pre>';
        echo '<pre>'; var_dump(
            !$order->details->contains(function($v, $k){
                return $v->ratings->count() > 0;
            })
        ); die(); echo '</pre>';
    }
    public function mailNormal(\Request $request)
    {
        \Mail::html('Ahihi', function($message) {
            $message->subject('Test mail trap')->to('alo@gmail.com');
        });
    }
    public function mailQueueAuto(\Request $request)
    {
        \Mail::to('mailtrap@gmail.com')->queue(new \App\Mail\OrderShipped());
    }
    public function mailQueueManual(\Request $request)
    {
        $order = \App\Models\Order::find(1);
        \App\Jobs\SendMail::dispatch('nguyenvanan9889@gmail.com', new \App\Mail\OrderSuccess($order, 'Dispath job send mail order success', '<p>Bạn đã đặt hàng thành công <b>'.$order->code.'</b></p><p>Cảm ơn</p>'));
    }
    public function collection()
    {
        $collect = collect(['an', 'huong', null, 'bun']);
        $collect = $collect->map(function($item){
            return strtoupper($item);
        })->reject(function($item){
            return empty($item);
        });
        // tách collection thành các colection con có cùng 1 giá trị
        $collect = collect(str_split('AABBCCCD'));
        $collect = $collect->chunkWhile(function($v, $k, $c){
            return $v == $c->last();
        });
        $news = \App\Models\News::all();
        dd($news->pluck('name', 'id'));
    }
    public function collectionMacro(\Request $request)
    {
        $collect = collect([1, 2, 3]);
        $collect2 = $collect->squared();
        $collect3 = $collect->plus(3);
        dd($collect2, $collect3);
    }
    public function storage()
    {
        // \Storage::disk('public')->put('example.txt', 'Contents');
        return view('storage');
    }
}

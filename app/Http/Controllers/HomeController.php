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
        $blo = 'blo';
        $this->pay = $pay;
        $this->db = $db;
        $this->log = $log;
        $this->payment = $payment;
    }

    public function index(Request $request)
    {
        \Session::put('alo', 'blo');
        echo \Session::get('alo');
        return view('alo');
    }
    public function blo(Request $request)
    {
        echo \Session::get('alo');
        return view('blo');
    }
    public function morphOneToOne()
    {
        $news = \App\Models\News::find(1);
        $image = \App\Models\Image::find(1);
        echo '<pre>'; var_dump($news->image, $image->imageable); die();
    }
    public function morphOneToMany()
    {
        $news = \App\Models\News::find(1);
        $image = \App\Models\Image::find(1);
        echo '<pre>'; var_dump($news->images, $image->imageable); die();
    }
    public function morphManyToMany()
    {
        $news = \App\Models\News::find(1);
        $tag = \App\Models\Tag::find(1);
        foreach ($news->tags as $key => $value) {
            echo '<pre>'; var_dump($value->pivot->toArray()); echo '</pre>';
        }
        echo '=========================<br>';
        echo "=========================<br>";
        echo '<pre>'; var_dump($news->tags); echo '</pre>';
        echo '=========================<br>';
        echo '<pre>'; var_dump($tag->news); echo '</pre>';
    }
    public function notifications(Request $request)
    {
        $user = User::find(2);
        $user->notify(new \App\Notifications\InvoicePaid(['title' => 'Alo', 'content' => 'Hello', 'reply' => 'Reply']));
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
        echo '<pre>'; var_dump(csrf_token()); die();
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
        throw new \Exception("Error Processing Request", 1);
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
    public function alo(){
        $one = \App\Models\One::where('id', 1)->first();
        $one->load('two');
        dump($one->two);
        return view('alo');
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
        $remainAmountAfterDeposit = 10;
        $remainAmountAfterFullPayment = 20;
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
    public function exceptoinUnauthorized(Request $request)
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
    public function mailNormal()
    {
        /**
         * This send below can't use queue
         */
        $to = 'nguyenvanan9889@gmail.com';
        $subject = 'Mail normal';
        $content = '<b style="color: red;">Wecome in the word</b>';
        \Mail::html($content, function($mail) use ($subject, $to) {
            $mail->subject($subject)->to($to);
        });
    }
    public function mailQueueAuto(Request $request)
    {
        /**
         * Require configuration queue before
         */
        $to = 'nguyenvanan9889@gmail.com';
        $subject = 'Mail auto queue';
        $content = '<p>Happy birthday to you</p>
                    <p>Nobody like you</p>
                    <p>You look like an animal</p>
                    <p>Go back to the zoo</p>';
        \Mail::to($to)->queue(new \App\Mail\Notification($subject, $content));
    }
    public function queue(Request $request)
    {
        /**
         * Require configuration queue before
         */
        $to = 'nguyenvanan9889@gmail.com';
        $subject = 'Mail auto queue';
        $content = '<p>Happy birthday to you</p>
                    <p>Nobody like you</p>
                    <p>You look like an animal</p>
                    <p>Go back to the zoo</p>';
        \App\Jobs\SendMail::dispatch($to, new \App\Mail\Notification($subject, $content));
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
    public function collectionMacro(Request $request)
    {
        $collect = collect([1, 2, 3]);
        $collect2 = $collect->squared();
        $collect3 = $collect->plus(3);
        dd($collect2, $collect3);
    }
    public function storage()
    {
        \Storage::put('app1.txt', '1');
        \Storage::disk('local')->put('app1.txt', '1');
        \storage::disk('public')->put('public1.txt', '1');
        echo \Storage::url('app/app1.txt');
        echo '<br>';
        echo \Storage::disk('public')->url('public1.txt');
        echo '<br>';
        var_dump(file_exists(base_path().\Storage::url('app/app1.txt')));
        var_dump(\Storage::disk('public')->size('public1.txt'));
        return view('storage');
    }
    public function storageFtp(Request $request)
    {
        \Storage::disk('ftp')->put('example.txt', 'Ahihi');
    }
    public function storageDownload(Request $request)
    {
        return \Storage::download('images/troll.png', 'filename-is-troll.png');
    }
    public function storageFileUpload(Request $request)
    {
        echo '<pre>'; var_dump($request->all()); die();
    }
    public function storageSaveFileUploadByUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('upload_file');
        }
        $path = $request->file('file')->storeAs(
            'avatars', 1
        );
        echo '<pre>'; var_dump($path); die();
    }
    public function httpClient(Request $request)
    {
        $response = \Http::withOptions(['verify' => false])->post(route('home').'/http-post-as-form-urlencode', [
                'name' => 'an',
                'age' => 32,
            ]);
        dd($response->body());
    }
    public function httpPostAsFormUrlendcode(Request $request)
    {
        echo '<pre>'; var_dump($request->all()); die();
    }
    public function translation()
    {
        \App::setlocale('vi');
        echo __('tran.hello_my_name', ['name' => 'an']);
        echo trans_choice('tran.apples', 1);
        echo trans_choice('tran.apples', 2);
    }
    public function broadcast()
    {
        event(new \App\Events\MyEvent('hello world'));
        return view('broadcast');
    }
    public function chatRealtimePusher(Request $request)
    {
        $username = $request->username;
        $chatto = $request->chatto;
        $content = $request->content;
        if ($request->isMethod('get')) {
            return view('chat_realtime_pusher', compact('username'));
        }
        \App\Events\Chat::dispatch($chatto, $content);
        return response()->json([
            'code' => 200,
            'content' => $content,
        ]);
    }
}

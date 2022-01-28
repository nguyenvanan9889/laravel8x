<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MercariCrawler extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $url = 'https://dantri.com.vn';
        $url = 'https://jp.mercari.com/search?category_id=8&t1_category_id=8&sort=price&order=asc';
        $url = 'https://188.com.vn/';
        $this->browse(function (Browser $browser) use ($url) {
            $browser->visit($url)
                ->storeConsoleLog('logs')
                ->screenshot('mercari')
                ->storeSource('mercarisource')
                ->pause(10)
                ->waitFor('.pro-flashsale');
        });
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Admin\Admin;
class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function after_login_admin_cant_access_dashboard_untill_ip_matched()
    {
        $admin = Admin::findorFail(1);
        $this->actingAs($admin);
        $this->get('admin/dashboard')->assertRedirect('/');
    }
}

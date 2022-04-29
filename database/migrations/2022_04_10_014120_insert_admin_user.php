<?php

use App\Http\Controllers\AnimeResourceController;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class InsertAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user->password = Hash::make("adminPassword");
        $user->email = 'admin@rya.com';
        $user->email_verified_at = Carbon::now();
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        $roles = Role::where('name', 'admin')->pluck('id')->toArray();
        $user->roles()->sync($roles);

        Storage::copy('public/default-avatar.png', 'public/avatars/' . $user->id);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('email', 'admin@rya.com')->delete();
    }
}

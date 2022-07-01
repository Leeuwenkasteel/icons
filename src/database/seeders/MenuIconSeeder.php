<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Leeuwenkasteel\Menu\Models\Menu;
use Leeuwenkasteel\Menu\Models\MenuFolder as Fol;
use Leeuwenkasteel\Menu\Models\MenuSettings as Set;
use Leeuwenkasteel\Auth\Models\Role;
use Leeuwenkasteel\Auth\Models\Permissions;
use App\Models\User;
use Carbon\Carbon;
use DB;
class MenuIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $new = new Fol();
        $new->title = 'Icons';
        $new->save();

        $folPerm = new Permissions();
        $folPerm->name = 'Icons';
        $folPerm->slug = 'icons';
        $folPerm->save();

        $admin = Role::whereSlug('admin')->get()->first()->id;
		DB::table('roles_permissions')->insert(['permissions_id' => $folPerm->id, 'role_id' => $admin]);
        
        $icon = new Menu();
        $icon->title = 'Icons';
        $icon->icon = '789';
        $icon->save();

        $iset = new Set();
        $iset->menu_id = $icon->id;
        $iset->route = 1;
        $iset->mig = 1;
        $iset->model = 1;
        $iset->controller = 1;
        $iset->form = 1;
        $iset->table = 1;
        $iset->show = 1;
        $iset->permission = 1;
        $iset->sluggable = 1;
        $iset->meta = null;
        $iset->resource = 1;
        $iset->folder_id = $new->id;
        $iset->package = 1;
        $iset->save();

        $iconIndex = new Permissions();
        $iconIndex->name = 'Icons Index';
        $iconIndex->slug = 'icons.index';
        $iconIndex->save();
        
        $iconCreate = new Permissions();
        $iconCreate->name = 'Icons Create';
        $iconCreate->slug = 'icons.create';
        $iconCreate->save();
        
        $iconShow = new Permissions();
        $iconShow->name = 'Icons Show';
        $iconShow->slug = 'icons.show';
        $iconShow->save();
        
        $iconEdit = new Permissions();
        $iconEdit->name = 'Icons Edit';
        $iconEdit->slug = 'icons.edit';
        $iconEdit->save();
        
        $iconDelete = new Permissions();
        $iconDelete->name = 'Icons Delete';
        $iconDelete->slug = 'icons.delete';
        $iconDelete->save();

        $admin = Role::whereSlug('admin')->get()->first()->id;
        DB::table('roles_permissions')->insert(['permissions_id' => $iconIndex->id, 'role_id' => $admin]);
        DB::table('roles_permissions')->insert(['permissions_id' => $iconCreate->id, 'role_id' => $admin]);
        DB::table('roles_permissions')->insert(['permissions_id' => $iconShow->id, 'role_id' => $admin]);
        DB::table('roles_permissions')->insert(['permissions_id' => $iconEdit->id, 'role_id' => $admin]);
        DB::table('roles_permissions')->insert(['permissions_id' => $iconDelete->id, 'role_id' => $admin]);
			
    }
}
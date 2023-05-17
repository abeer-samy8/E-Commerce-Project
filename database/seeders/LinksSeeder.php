<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Link;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          //Users
          $link = Link::create([
            'title'         => 'Users',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-users'
        ]);
        Link::create([
            'title'         => 'Users Management ',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'user.index',
            'icon'          => ''
        ]);
        Link::create([
            'title'         => 'Add New User  ',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'user.create',
            'icon'          => ''
        ]);

        //Products
        $link = Link::create([
            'title'         => 'Products',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-list'
        ]);
        Link::create([
            'title'         => 'Products Management',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'product.index',
            'icon'          => ''
        ]);
        Link::create([
            'title'         => ' Add New Product',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'product.create',
            'icon'          => ''
        ]);

         //Products
         $link = Link::create([
            'title'         => 'Categories',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-list'
        ]);
        Link::create([
            'title'         => 'Categories Management',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'category.index',
            'icon'          => ''
        ]);
        Link::create([
            'title'         => ' Add New Category',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'category.create',
            'icon'          => ''
        ]);



        //Static Pages
        $link = Link::create([
            'title'         => 'Stores',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-file'
        ]);
        Link::create([
            'title'         => 'Stores Management',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'store.index',
            'icon'          => ''
        ]);
        Link::create([
            'title'         => 'Add New Store',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'store.create',
            'icon'          => ''
        ]);

            //Static Pages
            $link = Link::create([
                'title'         => 'Currencies',
                'show_in_menu'  => 1,
                'parent_id'     => 0,
                'route'         => '',
                'icon'          => 'fa fa-list'
            ]);
            Link::create([
                'title'         => 'Currencies Management',
                'show_in_menu'  => 1,
                'parent_id'     => $link->id,
                'route'         => 'currency.index',
                'icon'          => ''
            ]);
            Link::create([
                'title'         => 'Add New Currency',
                'show_in_menu'  => 1,
                'parent_id'     => $link->id,
                'route'         => 'currency.create',
                'icon'          => ''
            ]);

            $link = Link::create([
                'title'         => 'Testimonials',
                'show_in_menu'  => 1,
                'parent_id'     => 0,
                'route'         => '',
                'icon'          => 'fa fa-bars'
            ]);
            Link::create([
                'title'         => 'Testimonials Management',
                'show_in_menu'  => 1,
                'parent_id'     => $link->id,
                'route'         => 'testimonial.index',
                'icon'          => ''
            ]);
            Link::create([
                'title'         => 'Add New Testimonial',
                'show_in_menu'  => 1,
                'parent_id'     => $link->id,
                'route'         => 'testimonial.create',
                'icon'          => ''
            ]);


        //Slider
        $link = Link::create([
            'title'         => 'Sliders',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-tv'
        ]);
        Link::create([
            'title'         => 'Sliders Management',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'slider.index',
            'icon'          => ''
        ]);
        Link::create([
            'title'         => 'Add New Slider',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'slider.create',
            'icon'          => ''
        ]);



        //Services
        $link = Link::create([
            'title'         => 'Services',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-cog'
        ]);
        Link::create([
            'title'         => 'Services Management',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'service.index',
            'icon'          => ''
        ]);
        Link::create([
            'title'         => 'Add New Service ',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'service.create',
            'icon'          => ''
        ]);

        //Orders
        $link = Link::create([
            'title'         => 'Orders',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-bars'
        ]);
        Link::create([
            'title'         => 'Orders Management',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'order.index',
            'icon'          => ''
        ]);
        $link = Link::create([
            'title'         => 'Customers',
            'show_in_menu'  => 1,
            'parent_id'     => 0,
            'route'         => '',
            'icon'          => 'fa fa-users'
        ]);
        Link::create([
            'title'         => 'Customers ',
            'show_in_menu'  => 1,
            'parent_id'     => $link->id,
            'route'         => 'customer.index',
            'icon'          => ''
        ]);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Link;

class LinksPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //المستخدم الحالي
        $user = auth()->user();
        //اسم الراوت المطلوب
        $routeName = Route::currentRouteName();
        //احضار الراوت المطلوب من القاعدة
        $linkFromDB = Link::where('route',$routeName)->first();
        //هل الراوت المطلوب من ضمن الصلاحيات
        if($linkFromDB){
            //هل المستخدم الطالب للراوت يملك صلاحية على الراوت المطلوب؟
            $isUserHaveAccessToLink = $user->links->where('id',$linkFromDB->id)->count();
            //اذا لا يملك الأخ
            if(!$isUserHaveAccessToLink){
                //الله يساهل عليه
                return redirect()->route("home")->with('msg','e:Sorry, you do not have validity on the requested link.');;

            }
        }
        return $next($request);//وظيفة النيكست هان عادة في اكتر من ميدل وير بيشتغل وهان وظيفتها تقوله خلصت هاد الميدل وي روح ع اللي بعده
    }
}

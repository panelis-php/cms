<?php

namespace Panelis\Cms\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Filament\Support\Icons\Heroicon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterNavigations
{
    /**
     * @param  Closure(Request):Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Filament::serving(function (): void {
            Filament::registerNavigationItems([
                NavigationItem::make(__('ui.source_code'))
                    ->sort(200)
                    ->group(__('setting.navigation'))
                    ->url('https://github.com/panelis-php/cms')
                    ->activeIcon(Heroicon::CodeBracket)
                    ->icon(Heroicon::OutlinedCodeBracket),
            ]);
        });

        return $next($request);
    }
}

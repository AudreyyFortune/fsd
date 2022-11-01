<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\Request;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class LangExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('lang', [$this, 'getLangNavigation']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('lang', [$this, 'getLangNavigation']),
        ];
    }

    public function getLangNavigation(Request $request)
    {
		return $request->getLocale();
    }
}
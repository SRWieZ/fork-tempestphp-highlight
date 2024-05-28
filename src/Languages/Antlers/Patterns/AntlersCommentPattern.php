<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Antlers\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(input: '{{# test #}} content', output: '{{# test #}}', )]
#[PatternTest(input: '{{ test }} content', output: null, )]
final readonly class AntlersCommentPattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        /* @lang PhpRegExp */
        return '/(?<match>{{#(.|\n)*?#}})/';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::COMMENT;
    }
}

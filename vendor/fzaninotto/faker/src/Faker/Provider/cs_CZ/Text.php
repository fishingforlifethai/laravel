<?php

namespace Faker\Provider\cs_CZ;

class Text extends \Faker\Provider\Text
{
    public function realText($maxNbChars = 200, $indexSize = 2)
    {
        $text = parent::realText($maxNbChars, $indexSize);
        $text = str_replace('„', '', $text);

        return str_replace('“', '', $text);
    }

   
    protected static $baseText = <<<'EOT'

EOT;
}

<?php

namespace Receiver;

use Error;

class DumbParser
{
    public string $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function htmlToString(): string|Error
    {
        $str = file_get_contents($this->url);

        if ($str != false) {
            return $str;
        }

        return throw new Error("error: bad url");
    }

    public function parseTags(): array|Error
    {
        $html = $this->htmlToString();
        // dumb regexp
        $regex = "/(<.*?[a-z].*?>)|(<\/[a-z].*?>)/";
        // find matches
        $tags = [];
        $result = preg_match_all($regex, $html, $tags, PREG_UNMATCHED_AS_NULL);

        if ($result === false) {
            return throw new Error("error: searching matches is failed");
        }

        //Remove trash
        unset($tags[1], $tags[2]);

        return $tags;
    }

    public function tagsWithCount(): array|Error
    {
        $tags = $this->parseTags();

        if ($tags instanceof Error) {
            return $tags;
        }

        return [
            "count" => count($tags[0]),
            "tags" => $tags[0]
        ];
    }
}
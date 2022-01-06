<?php

namespace Albedo\BlurryVision\Model;

class SelectorsComposite{

    private $selectors;

    public function __construct(
        array $selectors = []
    ) {
        $this->selectors = $selectors;
    }

    public function getSelectors(){
        $selectors = [];
        foreach($this->selectors as $key => $value){
            $selectors[$key] = ['label' => $key, 'selector'=>$value];
        }

        return $selectors;
    }
}

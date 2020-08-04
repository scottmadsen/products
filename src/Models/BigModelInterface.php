<?php

namespace ScottMadsen\Products\Models;

interface BigModelInterface {
    /**
     * @param $attr
     * @return mixed
     */
    public static function minReq(array $attr);
}

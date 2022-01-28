<?php

namespace Annv\MultipleChoice\Contracts;

abstract class AbstractQuestion {
    public abstract function getLayoutInput();
    public abstract function getLayoutOutput();
}
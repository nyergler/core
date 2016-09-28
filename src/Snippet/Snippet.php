<?php

namespace Freesewing;

/**
 * Freesewing\Snippet class.
 *
 * @author Joost De Cock <joost@decock.org>
 * @copyright 2016 Joost De Cock
 * @license http://opensource.org/licenses/GPL-3.0 GNU General Public License, Version 3
 */
class Snippet
{
    public $anchor;
    public $reference = null;
    public $description = null;

    public function setAnchor(\Freesewing\Point $anchor)
    {
        $this->anchor = $anchor;
    }
    
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getAnchor()
    {
        return $this->anchor;
    }
    
    public function getReference()
    {
        return $this->reference;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
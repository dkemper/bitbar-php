<?php

namespace SteveEdson;

class Bitbar {

    public function newLine() {
        return new BitbarLine();
    }
}

class BitbarLine {
    protected $usedPipe = false;
    protected $text;
    protected $colour;
    protected $url;
    protected $fontSize;
    protected $fontFace;
    protected $length;
    protected $trim = true;

    /**
     * @param mixed $text
     * @return $this
     */
    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function setColor($color) {
        $this->setColour($color);
    }

    /**
     * @param mixed $colour
     * @return $this
     */
    public function setColour($colour) {
        $this->colour = $colour;
        return $this;
    }

    /**
     * @param mixed $url
     * @return $this
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @param $length
     * @return $this
     */
    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

    /**
     * @param mixed $fontSize
     * @return $this
     */
    public function setFontSize($fontSize) {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @param mixed $fontFace
     * @return $this
     */
    public function setFontFace($fontFace) {
        $this->fontFace = $fontFace;
        return $this;
    }

    public function disableTrim() {
        $this->trim = false;
        return $this;
    }

    /**
     *
     */
    public function show() {
        $string = $this->text;

        if($this->fontFace && $this->fontSize) {
            if(!$this->usedPipe) {
                $string .= '|';
                $this->usedPipe = true;
            }

            $string .= ' ( \'size='.$this->fontSize . '\' \'font=' . $this->fontFace . '\' )';
        }

        if($this->colour) {
            if(!$this->usedPipe) {
                $string .= '|';
                $this->usedPipe = true;
            }

            $string .= ' color=' . $this->colour;
        }

        if($this->url) {
            if(!$this->usedPipe) {
                $string .= '|';
                $this->usedPipe = true;
            }

            $string .= ' href=' . $this->url;
        }

        if($this->trim === false) {
            if(!$this->usedPipe) {
                $string .= '|';
                $this->usedPipe = true;
            }

            $string .= ' trim=false';
        }

        if($this->length) {
            if(!$this->usedPipe) {
                $string .= '|';
                $this->usedPipe = true;
            }

            $string .= ' length=' . $this->length;
        }

        echo $string . "\n---\n";
    }
}
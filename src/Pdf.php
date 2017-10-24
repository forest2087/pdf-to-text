<?php

namespace forest\PdfToText;

use forest\PdfToText\Exceptions\CouldNotExtractText;
use forest\PdfToText\Exceptions\PdfNotFound;
use Symfony\Component\Process\Process;

class Pdf
{
    protected $pdf;

    protected $binPath;

    public function __construct(string $binPath = null)
    {
        $this->binPath = $binPath == null ? '/usr/bin/pdftotext' : $binPath;
    }

    public function setPdf($pdf)
    {
        if (!file_exists($pdf)) {
            throw new PdfNotFound("could not find pdf {$pdf}");
        }

        $this->pdf = $pdf;

        return $this;
    }

    public function text()
    {
        $process = new Process("{$this->binPath} '{$this->pdf}' -");
        $process->run();

        if (!$process->isSuccessful()) {
            throw new CouldNotExtractText($process);
        }

        return trim($process->getOutput(), " \t\n\r\0\x0B\x0C");
    }

    public static function getText($pdf, $binPath = null)
    {
        return (new static($binPath))
            ->setPdf($pdf)
            ->text();
    }
}

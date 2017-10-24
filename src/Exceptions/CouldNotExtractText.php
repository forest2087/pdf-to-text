<?php

namespace 4st\PdfToText\Exceptions;

use Symfony\Component\Process\Exception\ProcessFailedException;

class CouldNotExtractText extends ProcessFailedException
{
}

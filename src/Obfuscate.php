<?php declare(strict_types=1);

namespace Obfuscator\Obfuscate;

use Go\Instrument\Transformer\SourceTransformer;

class Obfuscate
{
    const DEFAULT_KEY = $_ENV['APP_KEY'];
    const DEFAULT_PREAMBLE = "<?php exit('Protected by Obfuscator.'); ?>\n\n";

    public function __construct(array $options = [], SourceTransformer $transformer = null)
    {
        $transformer = $transformer ?: new ObfuscateTransformer(
            static::DEFAULT_KEY,
            static::DEFAULT_PREAMBLE
        );
        $kernel = new Kernel($transformer);
        $kernel->init(array_merge([
            'debug' => false,
            'cacheDir' => null,
            Kernel::ENABLE_AOP => true,
        ], $options));
    }
}

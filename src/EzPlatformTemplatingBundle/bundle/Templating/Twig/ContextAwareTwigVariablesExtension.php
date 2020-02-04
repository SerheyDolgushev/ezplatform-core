<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace EzSystems\EzPlatformTemplatingBundle\Templating\Twig;

use eZ\Publish\Core\MVC\ConfigResolverInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class ContextAwareTwigVariablesExtension extends AbstractExtension implements GlobalsInterface
{
    /** @var \eZ\Publish\Core\MVC\ConfigResolverInterface */
    private $configResolver;

    public function __construct(
        ConfigResolverInterface $configResolver
    ) {
        $this->configResolver = $configResolver;
    }

    public function getGlobals(): array
    {
        return $this->configResolver->hasParameter('twig_variables')
            ? $this->configResolver->getParameter('twig_variables')
            : [];
    }
}

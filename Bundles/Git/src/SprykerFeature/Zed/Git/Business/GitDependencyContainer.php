<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Git\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use SprykerFeature\Zed\Git\GitConfig;
use SprykerFeature\Zed\Git\GitDependencyProvider;
use Symfony\Component\Console\Command\Command;

/**
 * @method GitConfig getConfig()
 */
class GitDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return Command[]
     */
    public function getConsoleCommands()
    {
        return $this->getProvidedDependency(GitDependencyProvider::COMMANDS);
    }

}

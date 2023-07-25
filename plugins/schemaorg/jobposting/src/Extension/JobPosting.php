<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  Schemaorg.jobposting
 * @subpackage  Schemaorg.jobposting
 *
 * @copyright   (C) 2023 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

namespace Joomla\Plugin\Schemaorg\JobPosting\Extension;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Schemaorg\SchemaorgPluginTrait;
use Joomla\Event\SubscriberInterface;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Schemaorg Plugin
 *
 * @since  5.0.0
 */
final class JobPosting extends CMSPlugin implements SubscriberInterface
{
    use SchemaorgPluginTrait;

    /**
     * Load the language file on instantiation.
     *
     * @var    boolean
     * @since  5.0.0
     */
    protected $autoloadLanguage = true;

    /**
     * The name of the schema form
     *
     * @var   string
     * @since 5.0.0
     */
    protected $pluginName = 'JobPosting';

    /**
     *  To add plugin specific functions
     *
     *  @param   array $schema Schema form
     *
     *  @return  array Updated schema form
     */
    public function customCleanup(array $schema)
    {
        $schema = $this->cleanupDate($schema, ['datePosted', 'validThrough']);

        return $schema;
    }
}

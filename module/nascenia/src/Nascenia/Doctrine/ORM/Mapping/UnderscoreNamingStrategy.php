<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Doctrine\ORM\Mapping;

use Doctrine\ORM\Mapping\UnderscoreNamingStrategy as DoctrineUnderscoreNamingStrategy;

class UnderscoreNamingStrategy extends DoctrineUnderscoreNamingStrategy
{
    /**
     * An array of module name to table prefix.
     *
     * @var array
     */
    protected $tablePrefixes = array();

    /**
     * @param array $tablePrefixes
     */
    public function setTablePrefixes($tablePrefixes)
    {
        $this->tablePrefixes = $tablePrefixes;
    }

    /**
     * @return array
     */
    public function getTablePrefixes()
    {
        return $this->tablePrefixes;
    }

    protected function prependTablePrefix($tableName, $className)
    {
        $module = strstr($className, '\\', true);
        if (isset($this->tablePrefixes[$module]))
        {
            $prefix = $this->tablePrefixes[$module];
            return $prefix . $tableName;
        }
        return $tableName;
    }

    public function classToTableName($className)
    {
        $tableName = parent::classToTableName($className);
        return $this->prependTablePrefix($tableName, $className);
    }

    public function joinTableName($sourceEntity, $targetEntity, $propertyName = null)
    {
        return $this->classToTableName($sourceEntity) . '_x_' . $this->classToTableName($targetEntity);
    }
}

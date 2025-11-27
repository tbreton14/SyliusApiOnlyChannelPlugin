<?php

declare(strict_types=1);

namespace Tbreton14\SyliusApiOnlyChannelPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240201ApiOnlyChannel extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds apiOnly boolean column to sylius_channel table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->getTable('sylius_channel');

        if (!$table->hasColumn('apiOnly')) {
            $this->addSql('ALTER TABLE sylius_channel ADD apiOnly TINYINT(1) NOT NULL DEFAULT 0');
        }
    }

    public function down(Schema $schema): void
    {
        $table = $schema->getTable('sylius_channel');

        if ($table->hasColumn('apiOnly')) {
            $this->addSql('ALTER TABLE sylius_channel DROP COLUMN apiOnly');
        }
    }
}


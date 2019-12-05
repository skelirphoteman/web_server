<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191022124944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_player ADD caracteristics_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sport_player ADD CONSTRAINT FK_FCC6AEC45D20926C FOREIGN KEY (caracteristics_id) REFERENCES caracteristics_sport_player (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FCC6AEC45D20926C ON sport_player (caracteristics_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_player DROP FOREIGN KEY FK_FCC6AEC45D20926C');
        $this->addSql('DROP INDEX UNIQ_FCC6AEC45D20926C ON sport_player');
        $this->addSql('ALTER TABLE sport_player DROP caracteristics_id');
    }
}

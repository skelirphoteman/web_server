<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191021233620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, image_filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sport_player ADD profil_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sport_player ADD CONSTRAINT FK_FCC6AEC4214C50C0 FOREIGN KEY (profil_image_id) REFERENCES media (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FCC6AEC4214C50C0 ON sport_player (profil_image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_player DROP FOREIGN KEY FK_FCC6AEC4214C50C0');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP INDEX UNIQ_FCC6AEC4214C50C0 ON sport_player');
        $this->addSql('ALTER TABLE sport_player DROP profil_image_id');
    }
}

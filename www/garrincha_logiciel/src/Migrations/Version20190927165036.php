<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190927165036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE value_physical_test (id INT AUTO_INCREMENT NOT NULL, sport_player_id INT DEFAULT NULL, physical_test_id INT DEFAULT NULL, value VARCHAR(255) DEFAULT NULL, _at DATETIME DEFAULT NULL, options JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', INDEX IDX_C7F71DEAB2640DB2 (sport_player_id), INDEX IDX_C7F71DEAAE5AC74 (physical_test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE value_physical_test ADD CONSTRAINT FK_C7F71DEAB2640DB2 FOREIGN KEY (sport_player_id) REFERENCES sport_player (id)');
        $this->addSql('ALTER TABLE value_physical_test ADD CONSTRAINT FK_C7F71DEAAE5AC74 FOREIGN KEY (physical_test_id) REFERENCES physical_test (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE value_physical_test');
    }
}

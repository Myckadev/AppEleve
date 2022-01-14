<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113211046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu_competence (contenu_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_964892E23C1CC488 (contenu_id), INDEX IDX_964892E215761DAB (competence_id), PRIMARY KEY(contenu_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contenu_competence ADD CONSTRAINT FK_964892E23C1CC488 FOREIGN KEY (contenu_id) REFERENCES contenu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenu_competence ADD CONSTRAINT FK_964892E215761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenu_competence DROP FOREIGN KEY FK_964892E215761DAB');
        $this->addSql('ALTER TABLE contenu_competence DROP FOREIGN KEY FK_964892E23C1CC488');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE contenu');
        $this->addSql('DROP TABLE contenu_competence');
    }
}

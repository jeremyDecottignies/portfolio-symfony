<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260407162602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE experience_competence (experience_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_7B75D7C346E90E27 (experience_id), INDEX IDX_7B75D7C315761DAB (competence_id), PRIMARY KEY (experience_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE project_competence (project_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_8C72134D166D1F9C (project_id), INDEX IDX_8C72134D15761DAB (competence_id), PRIMARY KEY (project_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE experience_competence ADD CONSTRAINT FK_7B75D7C346E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_competence ADD CONSTRAINT FK_7B75D7C315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_competence ADD CONSTRAINT FK_8C72134D166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_competence ADD CONSTRAINT FK_8C72134D15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience_competence DROP FOREIGN KEY FK_7B75D7C346E90E27');
        $this->addSql('ALTER TABLE experience_competence DROP FOREIGN KEY FK_7B75D7C315761DAB');
        $this->addSql('ALTER TABLE project_competence DROP FOREIGN KEY FK_8C72134D166D1F9C');
        $this->addSql('ALTER TABLE project_competence DROP FOREIGN KEY FK_8C72134D15761DAB');
        $this->addSql('DROP TABLE experience_competence');
        $this->addSql('DROP TABLE project_competence');
    }
}

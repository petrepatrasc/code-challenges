<?php


namespace petrepatrasc\TagsCP\MigrationBundle\Command;


use JMS\Serializer\DeserializationContext;
use petrepatrasc\TagsCP\MigrationBundle\Entity\Collection\People;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('tagscp:import')
            ->setDescription('Import data from XML files');
    }

    protected function execute(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $importDir = $this->getContainer()->getParameter('kernel.root_dir') . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR;

        $serializerService = $this->getContainer()->get('serializer');
        /** @var People $data */
        $data = $serializerService->deserialize(file_get_contents($importDir . 'people.xml'), 'petrepatrasc\TagsCP\MigrationBundle\Entity\Collection\People', 'xml');

        var_export($data);die;
    }
} 
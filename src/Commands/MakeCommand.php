<?php

namespace Mehedi\BcryptCommand\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCommand extends Command
{
    protected static $defaultName = 'make';

    protected static $defaultDescription = 'Generate a hash of a string';

    protected function configure()
    {
        $this->addArgument('text', InputArgument::REQUIRED, 'String that will be convert into bcrypt hash')
            ->addOption('round', 'r', InputArgument::OPTIONAL, 'Round of bcrypt', 10);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = $input->getArgument('text');
        $round = $input->getOption('round');

        $hash = password_hash($text, PASSWORD_BCRYPT, ['cost' => intval($round)]);

        $output->writeln(sprintf('<options=bold>Text: </options=bold>%s', $text));
        $output->writeln(sprintf('<options=bold>Hash: </options=bold>%s', $hash));

        return Command::SUCCESS;
    }
}
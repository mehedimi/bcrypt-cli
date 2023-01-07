<?php

namespace Mehedi\BcryptCommand\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class VerifyCommand extends Command
{
    protected static $defaultName = 'verify';

    protected static $defaultDescription = 'Verify a text with a hash';

    protected function configure()
    {
        $this->addArgument('text', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $hashInput = new Question('<options=bold>Please enter the hash: </options=bold>');
        $text = $input->getArgument('text');

        $hash = $helper->ask($input, $output, $hashInput);

        if (empty($hash)) {
            $output->writeln("\n<error>Hash can not be empty</error>");
            return Command::FAILURE;
        }

        $hasMatch = password_verify($text, $hash);
        $output->writeln(sprintf("\n<options=bold>Text: </options=bold>%s", $text));
        $output->writeln(sprintf('<options=bold>Hash: </options=bold>%s', $hash));
        $output->writeln(sprintf('<options=bold>Match: </options=bold>%s', $hasMatch ? 'Yes' : 'No'));

        return Command::SUCCESS;
    }
}
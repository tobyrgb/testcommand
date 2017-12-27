<?php

namespace Z4net\PatternGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class MakePattern extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pattern {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new pattern class';

    protected $type = 'Pattern';

    // /**
    //  * Execute the console command.
    //  *
    //  * @return bool|null
    //  */
    // public function handle()
    // {
    //     $name = $this->anticipate('What pattern do you make? (repository or service)', ['repository', 'service']);
    //     return parent::handle();
    // }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/pattern.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $subPath = '';
        switch (trim($this->argument('name'))) {
            case 'repository':
                $subPath = 'Repositories';
                break;
            case 'service':
                $subPath = 'Services';
                break;
        }
        return $rootNamespace . '\\' . $subPath;
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        switch (trim($this->argument('name'))) {
            case 'repository':
                return 'Repository';
                break;
            case 'service':
                return 'Service';
                break;
        }
    }

}

<?php

namespace Z4net\PatternGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeService extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {--repo=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    protected $type = 'Service';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)->replaceRepository($stub)->replaceClass($stub, $name);
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceRepository(&$stub)
    {
        $repoName = $this->option('repo');

        if (!$repoName) {
            $pos = strpos($this->getNameInput(), 'Service');
            $repoName = $pos == 0 ? 'DummyRepository' : substr($this->getNameInput(), 0, $pos) . 'Repository';
        }

        $stub = str_replace(
            'DummyRepository', $repoName, $stub
        );

        return $this;
    }
}

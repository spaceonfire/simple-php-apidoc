<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

use Symfony\Component\Filesystem\Filesystem;

final class LocalFilesystemPersister implements PersisterInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var string
     */
    private $outputDirectory;

    /**
     * LocalFilesystemPersister constructor.
     * @param string $outputDirectory
     * @param Filesystem|null $filesystem
     */
    public function __construct(string $outputDirectory, ?Filesystem $filesystem = null)
    {
        $this->outputDirectory = rtrim($outputDirectory, '/\\');
        $this->filesystem = $filesystem ?? new Filesystem();
    }

    /**
     * @inheritDoc
     */
    public function persist(File $file): void
    {
        $this->filesystem->dumpFile(
            $this->outputDirectory . DIRECTORY_SEPARATOR . $file->getName(),
            $file->getContent()
        );
    }
}

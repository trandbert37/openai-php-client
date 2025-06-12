<?php

declare(strict_types=1);

namespace OpenAI\Responses\Responses\Tool;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @phpstan-type RemoteMcpToolType array{type: 'mcp', server_label: string, server_url: string}
 *
 * @implements ResponseContract<RemoteMcpToolType>
 */
final class RemoteMcpTool implements ResponseContract
{
    /**
     * @use ArrayAccessible<RemoteMcpToolType>
     */
    use ArrayAccessible;

    use Fakeable;

    /**
     * @param  'mcp'  $type
     * @param  string  $serverLabel
     * @param  string  $serverUrl
     */
    private function __construct(
        public readonly string $type,
        public readonly string $serverLabel,
        public readonly string $serverUrl,
    ) {}

    /**
     * @param  RemoteMcpToolType  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            type: $attributes['type'],
            serverLabel: $attributes['server_label'],
            serverUrl: $attributes['server_url'],
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'server_label' => $this->serverLabel,
            'server_url' => $this->serverUrl,
        ];
    }
}

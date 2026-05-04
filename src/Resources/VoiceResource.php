<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

class VoiceResource extends Resource
{
    /**
     * Get available voice options for a language.
     */
    public function options(string $language): array
    {
        return $this->http->get("voice-options/{$language}");
    }

    /**
     * Test voice synthesis.
     */
    public function testSynthesis(array $data): array
    {
        return $this->http->post('test-voice-synthesis', $data);
    }
}

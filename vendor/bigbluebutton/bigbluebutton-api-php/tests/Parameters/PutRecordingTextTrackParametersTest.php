<?php

/*
 * BigBlueButton open source conferencing system - https://www.bigbluebutton.org/.
 *
 * Copyright (c) 2016-2024 BigBlueButton Inc. and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * BigBlueButton is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with BigBlueButton; if not, see <https://www.gnu.org/licenses/>.
 */

namespace BigBlueButton\Parameters;

use BigBlueButton\TestCase;

/**
 * @internal
 */
class PutRecordingTextTrackParametersTest extends TestCase
{
    public function testPutRecordingTextTrackParameters(): void
    {
        $getRecordingTextTracksParams = new PutRecordingTextTrackParameters(
            $recordId = $this->faker->uuid,
            $kind     = $this->faker->word,
            $lang     = $this->faker->languageCode,
            $label    = $this->faker->name
        );

        $this->assertEquals($recordId, $getRecordingTextTracksParams->getRecordId());
        $this->assertEquals($kind, $getRecordingTextTracksParams->getKind());
        $this->assertEquals($lang, $getRecordingTextTracksParams->getLang());
        $this->assertEquals($label, $getRecordingTextTracksParams->getLabel());

        $getRecordingTextTracksParams->setRecordId($newRecordId = $this->faker->uuid);
        $this->assertEquals($newRecordId, $getRecordingTextTracksParams->getRecordId());
    }
}

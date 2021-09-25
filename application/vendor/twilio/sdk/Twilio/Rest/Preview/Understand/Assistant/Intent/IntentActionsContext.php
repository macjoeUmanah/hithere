<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Assistant\Intent;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class IntentActionsContext extends InstanceContext {
    /**
     * Initialize the IntentActionsContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $assistantSid The assistant_sid
     * @param string $intentSid The intent_sid
     * @return \Twilio\Rest\Preview\Understand\Assistant\Intent\IntentActionsContext 
     */
    public function __construct(Version $version, $assistantSid, $intentSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, 'intentSid' => $intentSid, );

        $this->uri = '/Assistants/' . rawurlencode($assistantSid) . '/Intents/' . rawurlencode($intentSid) . '/Actions';
    }

    /**
     * Fetch a IntentActionsInstance
     * 
     * @return IntentActionsInstance Fetched IntentActionsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new IntentActionsInstance(
            $this->version,
            $payload,
            $this->solution['assistantSid'],
            $this->solution['intentSid']
        );
    }

    /**
     * Update the IntentActionsInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return IntentActionsInstance Updated IntentActionsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Actions' => Serialize::jsonObject($options['actions']), ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new IntentActionsInstance(
            $this->version,
            $payload,
            $this->solution['assistantSid'],
            $this->solution['intentSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Understand.IntentActionsContext ' . implode(' ', $context) . ']';
    }
}
<?php

/**
 * Governs the actions that loan agents can perform.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
interface LoanAgentInterface
{
    /**
     * Get the maximum threshold that an agent is allowed to aprove.
     *
     * @return int
     */
    public function getThreshold();
}

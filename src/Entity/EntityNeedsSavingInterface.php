<?php

namespace Drupal\entity_helpers\Entity;

/**
 * Allows an entity to define whether it needs to be saved.
 */
interface EntityNeedsSavingInterface {

  /**
   * Checks whether the entity needs to be saved.
   *
   * @return bool
   *   TRUE if the entity needs to be saved.
   */
  public function needsSave();

}

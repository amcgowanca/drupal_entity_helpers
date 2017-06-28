<?php

namespace Drupal\entity_helpers\Entity;

use Drupal\Core\Entity\EntityInterface;

/**
 * Interface for defining entities that reference a "parent" entity.
 */
interface EntityHasParentEntityReferenceInterface extends EntityNeedsSavingInterface {

  /**
   * Returns the parent entity.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   The parent entity. If no parent exists, returns NULL.
   */
  public function getParentEntity();

  /**
   * Returns the parent entity's entity type.
   *
   * @return \Drupal\Core\Entity\EntityTypeInterface
   *   The parent entity's entity type. If no parent exists, returns NULL.
   */
  public function getParentEntityType();

  /**
   * Returns the parent entity's identifier.
   *
   * @return int
   *   The ID of the parent entity. If no parent exists, returns NULL.
   */
  public function getParentEntityId();

  /**
   * Sets the parent entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $parent_entity
   *   The parent entity to set.
   *
   * @return \Drupal\entity_helpers\Entity\EntityHasParentEntityReferenceInterface
   *   This instance.
   */
  public function setParentEntity(EntityInterface $parent_entity);

}

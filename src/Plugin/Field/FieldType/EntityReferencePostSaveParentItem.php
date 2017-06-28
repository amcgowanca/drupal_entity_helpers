<?php

namespace Drupal\entity_helpers\Plugin\Field\FieldType;

use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\entity_helpers\Entity\EntityHasParentEntityReferenceInterface;

/**
 * An Entity Reference field type that tracks parent entity type and ID.
 *
 * @FieldType(
 *   id = "entity_reference_postsave_parent_item",
 *   label = @Translation("Entity reference with post-save"),
 *   description = @Translation("An entity field containing an entity reference that performs a second save."),
 *   category = @Translation("Reference - Post-save action"),
 *   default_widget = "entity_reference_autocomplete",
 *   default_formatter = "entity_reference_label",
 *   list_class = "\Drupal\Core\Field\EntityReferenceFieldItemList"
 * )
 */
class EntityReferencePostSaveParentItem extends EntityReferenceItem {

  /**
   * {@inheritdoc}
   */
  public function postSave($update) {
    parent::postSave($update);

    if (!$this->entity) {
      return;
    }

    /** @var \Drupal\Core\Entity\FieldableEntityInterface $entity */
    $entity = $this->entity;
    if ($entity instanceof EntityHasParentEntityReferenceInterface) {
      $parent = $this->getEntity();
      $entity->setParentEntity($parent);
      if ($entity->needsSave()) {
        if ($entity instanceof RevisionableInterface) {
          $entity->setNewRevision(FALSE);
        }
        $entity->save();
      }
    }
  }

}

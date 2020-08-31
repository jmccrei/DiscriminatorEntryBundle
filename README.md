# DiscriminatorEntryBundle
Symfony/Doctrine discrimination bundle. 
Adds @DiscriminatorEntry to bind entities together.

@DiscriminatorEntry removes the logic of defining a full DiscriminatorMap on the parent entity. 
@DiscriminatorEntry is great for uses cases when you may not have override abilities for a parent entity, but want to implement discrimination anyways.
Simply place @DiscriminatorEntry onto the child class and it will auto-magically be picked up as a child discriminator.

Usage
---
App/Entity/ParentEntity
```
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jmccrei\DiscriminatorEntryBundle\Annotation as Jmccrei;

/**
 * @ORM\Entity()
 * @ORM\Table("temp_parent_entity")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn("disc", type="string")
 * @Jmccrei\DiscriminatorEntry("parent")
 */
class ParentEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Get Id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}
```

App\Entity\ChildEntityOne
```
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jmccrei\DiscriminatorEntryBundle\Annotation as Jmccrei;

/**
 * @ORM\Entity()
 * @ORM\Table("temp_child_entity_one")
 * @Jmccrei\DiscriminatorEntry("one")
 */
class ChildEntityOne extends ParentEntity
{
}
```

App\Entity\ChildEntityTwo
```
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jmccrei\DiscriminatorEntryBundle\Annotation as Jmccrei;

/**
 * @ORM\Entity()
 * @ORM\Table("temp_child_entity_two")
 * @Jmccrei\DiscriminatorEntry("two")
 */
class ChildEntityTwo extends ParentEntity
{
}
```

What to expect
---
When querying for any children, make your doctrine query as normal, except use the parent entity as the entry class. If the ID is associated with a child entity, doctrine will return the child entity class.

```
// query for a child entity (assume ChildEntityTwo)
$entity = $this->getDoctrine()->getManager()->find( ParentEntity::class, 'ID' );

echo get_class( $entity ); // Output: App/Entity/ChildEntityTwo
```
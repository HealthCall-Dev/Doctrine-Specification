<?php
declare(strict_types=1);

/**
 * This file is part of the Happyr Doctrine Specification package.
 *
 * (c) Tobias Nyholm <tobias@happyr.com>
 *     Kacper Gunia <kacper@gunia.me>
 *     Peter Gribanov <info@peter-gribanov.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests\Happyr\DoctrineSpecification\Result;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query;
use Happyr\DoctrineSpecification\Result\AsSingleScalar;
use Happyr\DoctrineSpecification\Result\ResultModifier;
use PhpSpec\ObjectBehavior;

/**
 * @mixin AsSingleScalar
 */
final class AsSingleScalarSpec extends ObjectBehavior
{
    public function it_is_a_result_modifier(): void
    {
        $this->shouldBeAnInstanceOf(ResultModifier::class);
    }

    public function it_sets_hydration_mode_to_object(AbstractQuery $query): void
    {
        $query->setHydrationMode(Query::HYDRATE_SINGLE_SCALAR)->shouldBeCalled()->willReturn($query);

        $this->modify($query);
    }
}

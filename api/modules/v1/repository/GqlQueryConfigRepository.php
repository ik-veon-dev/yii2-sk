<?php

namespace api\modules\v1\repository;

use api\modules\v1\interfaces\gql\GqlGetCountInterface;
use api\modules\v1\interfaces\gql\GqlGetListInterface;
use api\modules\v1\interfaces\gql\GqlGetOneInterface;
use api\modules\v1\interfaces\gql\GqlMutationInterface;
use api\modules\v1\interfaces\gql\GqlRemoverMutationInterface;

class GqlQueryConfigRepository
{
    private GqlGetListInterface | GqlGetOneInterface | GqlMutationInterface | GqlRemoverMutationInterface | GqlGetCountInterface $gqlConfig;

    public function __construct(GqlGetListInterface | GqlGetOneInterface | GqlMutationInterface | GqlRemoverMutationInterface | GqlGetCountInterface $gqlConfig)
    {
        return $this->gqlConfig = $gqlConfig;
    }
    public function buildGetOneQuery(): array
    {
        return $this->gqlConfig->buildGetOneQuery();
    }
    public function buildGetListQuery(): array
    {
        return $this->gqlConfig->buildGetListQuery();
    }
    public function buildMutationQuery(): array
    {
        return $this->gqlConfig->buildMutationQuery();
    }
    public function buildRemoverMutationQuery(): array
    {
        return $this->gqlConfig->buildRemoverMutationQuery();
    }
    public function buildGetCountQuery(): array
    {
        return $this->gqlConfig->buildGetCountQuery();
    }

}

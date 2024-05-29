<?php

namespace api\modules\v1\interfaces\gql;

interface GqlRemoverMutationInterface
{
    public function buildRemoverMutationQuery(): array;
}

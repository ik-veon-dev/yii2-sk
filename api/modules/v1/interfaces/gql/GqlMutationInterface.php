<?php

namespace api\modules\v1\interfaces\gql;

interface GqlMutationInterface
{
    public function buildMutationQuery(): array;
}

<?php

namespace api\modules\v1\interfaces\gql;

interface GqlGetOneInterface
{
    public function buildGetOneQuery(): array;
}

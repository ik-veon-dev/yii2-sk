<?php

namespace api\modules\v1\interfaces\gql;

interface GqlGetListInterface
{
    public function buildGetListQuery(): array;
}

<?php

namespace api\modules\v1\interfaces\gql;

interface GqlGetCountInterface
{
    public function buildGetCountQuery(): array;
}

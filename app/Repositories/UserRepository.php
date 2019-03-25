<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;

class UserRepository extends BaseRepository
{
    /**
    * 定义数据模型
    */
    const MODEL = User::class;

    /**
     * @param array $attributes
     * @return User
     * @throws GeneralException
     */
    public function store(array $attributes)
    {
        $user = $this->serialization($attributes);

        try {
            $user->save();
            return $user;
        } catch (Exception $exception) {
            throw new GeneralException($exception);
        }
    }

    /**
     * @param User $user
     * @param array $attributes
     * @return User
     * @throws GeneralException
     */
    public function update(User $user, array $attributes)
    {
        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                $user->$key = $value;
            }
            $user->saveOrFail();
            return $user;
        }
        throw new GeneralException('要更新的属性必须是数组');
    }

    /**
     * @param User $user
     * @param bool $force
     * @return bool|null
     * @throws GeneralException
     */
    public function delete(User $user, $force = false)
    {
        try {
            return $force ? $user->forceDelete() : $user->delete();
        } catch (Exception $exception) {
            throw new GeneralException('删除信息失败');
        }
    }

    /**
     * 序列化输入
     *
     * @param array $attributes
     * @return User
     */
    protected function serialization(array $attributes)
    {
        //
    }
}
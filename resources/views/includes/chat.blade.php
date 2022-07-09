<div class="chat__wrapper">
    <div class="chat">
        <button class="chat__btn js-contacts" type="button">Контакты</button>
        <button class="chat__btn js-create-contact" type="button">Создать контакт</button>
        <div class="chats">
            <div class="chat__contact is-online js-begin-chat">
                <span class="chat__name">Контакт 1</span>
                <span class="chat__status">online</span>
                <span class="chat__count">5</span>
            </div>
            <div class="chat__contact js-begin-chat">
                <span class="chat__name">Контакт 2</span>
                <span class="chat__status">offline</span>
                <span class="chat__count">2</span>
            </div>
        </div>
        <button class="chat__close js-close-chat" type="button">Закрыть</button>
        <div class="chat__inner">
            <div class="chat__contacts">
                <div class="chat__contact is-online js-chat-contact">
                    <span class="chat__name">Контакт 1</span>
                    <span class="chat__status">online</span>
                </div>
                <div class="chat__contact js-chat-contact">
                    <span class="chat__name">Контакт 2</span>
                    <span class="chat__status">offline</span>
                </div>
            </div>
            <button class="chat__close js-close-chat-contacts" type="button">Закрыть</button>
        </div>
        <div class="chat__settings">
            <div class="chat__contact is-online">
                <span class="chat__name">Контакт 1</span>
                <span class="chat__status">ON Line</span>
            </div>
            <div class="chat__row">
                <button class="chat__close" type="button">Отправить ссылку</button>
                <button class="chat__close js-edit-chat" type="button">Изменить контакт</button>
                <button class="chat__close js-begin-chat" type="button">Открыть чат</button>
                <button class="chat__close js-open-delete" type="button">Удалить чат</button>
            </div>
            <button class="chat__close js-close-settings" type="button">Закрыть</button>
            <div class="chat__edit">
                <p class="chat__subtitle">Изменить контакт</p>
                <input class="form-control input" type="text" placeholder="Ваши данные">
                <div class="chat__buttons">
                    <button class="chat__close"
                            style="margin-bottom: 0px"
                            type="submit">
                        Изменить
                    </button>
                    <button class="chat__close js-close-edit"
                            style="margin-bottom: 0px"
                            type="button">
                        Закрыть
                    </button>
                </div>
            </div>
            <div class="chat__delete">
                <p class="chat__subtitle">Удалить контакт</p>
                <input class="form-control input" type="text" placeholder="Ваши данные">
                <div class="chat__buttons">
                    <button class="chat__close"
                            style="margin-bottom: 0px"
                            type="submit">
                        Удалить
                    </button>
                    <button class="chat__close js-close-chat-delete"
                            style="margin-bottom: 0px"
                            type="button">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
        <div class="chat__create">
            <div class="chat__inputs">
                <input class="chat__input" type="text" placeholder="Имя">
                <input class="chat__input" type="text" placeholder="Фамилия">
                <input class="chat__input" type="email" placeholder="Почта">
            </div>
            <div class="chat__buttons">
                <button class="chat__close" type="button">Пригласить</button>
                <button class="chat__close js-close-create" type="button">Закрыть</button>
            </div>
        </div>
        <div class="chat__wrap">
            <div class="chat__contact is-online">
                <span class="chat__name">Пользоватеь 1</span>
                <span class="chat__status">На связи</span>
            </div>
            <div class="chat__buttons three__mod">
                <button class="chat__close js-show-btns" type="button">Изменить</button>
                <button class="chat__close js-select-all" type="button" style="display: none;">Выбрать все</button>
                <button class="chat__close js-delete-messages" type="button" style="display: none;">Удалить</button>
            </div>
            <div class="chat__window">
                <div class="chat__holder">
                    @for($i=1;$i<=4;$i++)
                        <div class="chat__message receiver">
                            <div class="checkbox-item">
                                <input type="checkbox"
                                       class="custom-checkbox"
                                       id="messageTest{{$i}}">
                                <label for="messageTest{{$i}}"></label>
                            </div>
                            <img class="chat__decor left__mod" src="{{ asset('images/message-decor.png') }}" alt="#">
                            <p>Получатель сообщения</p>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="chat__field-wrap">
                <div class="chat__field">
                    <img class="chat__decor left__mod" src="{{ asset('images/message-decor.png') }}" alt="#">
                    <textarea class="chat__textarea js-chat-textarea" placeholder="сообщение"></textarea>
                    <img class="chat__decor right__mod" src="{{ asset('images/message-decor.png') }}" alt="#">
                </div>
                <input class="btn__emoji js-btn-emoji"
                       type="image"
                       src="{{ asset('/images/emoji_1.png') }}"/>
                <div class="chat__emoji-holder">
                    @for($i=1;$i<=24;$i++)
                        <img src="{{ asset('/images/emoji_' . $i . '.png') }}"
                             style="width: auto;height: 32px">
                    @endfor
                </div>
            </div>
            <div class="chat__buttons six__mod">
                <button data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
                        class="chat__close"
                        type="button">Twitter</button>
                <button data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
                        class="chat__close"
                        type="button">Facebook</button>
                <button data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
                        class="chat__close"
                        type="button">Telegram</button>
                <button class="chat__close"
                        type="button">Отправить</button>
                <button class="chat__close"
                        data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
                        type="button">Отправить ссылку</button>
                <button class="chat__close js-close-messages"
                        type="button">Закрыть</button>
            </div>
        </div>
    </div>
    <button class="chat__open js-open-chat" type="button">
    <span class="chat__icon">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
            <path d="M32,3C15.4,3,0,16.2,0,30c0,7.8,6.3,14.7,13,19.3c-0.1,1.2-0.9,5.3-5.7,9.8c-0.7,0.7-0.2,1.8,0.8,1.7
                c8.6-1,15.5-5.8,16.7-6.7c1.4,0.3,4.6,0.8,7.2,0.8c16.6,0,32-11.2,32-25S48.6,3,32,3z"/>
        </svg>
    </span>
        <span class="chat__open-text">Чат</span>
    </button>
</div>
